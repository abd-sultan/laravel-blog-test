<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleTest extends TestCase
{
  use RefreshDatabase;

  // Tester si un utilisateur non connecté peut voir la liste des articles
  public function test_guest_can_view_articles()
  {
    $article = Article::factory()->create();

    $response = $this->get(route('articles.index'));
    $response->assertStatus(200);
    $response->assertSee($article->title);
  }

  // Tester si un utilisateur non connecté peut créer un article
  public function test_guest_cannot_create_article()
  {
    $response = $this->get(route('articles.create'));
    $response->assertRedirect(route('login'));
  }

  // Tester si un utilisateur connecté peut créer un article
  public function test_authenticated_user_can_create_article()
  {
    $user = User::factory()->create();
    $category = Category::factory()->create();

    $articleData = [
      'title' => 'Test Article',
      'content' => 'Test Content',
      'category_id' => $category->id,
    ];

    $response = $this->actingAs($user)
      ->post(route('articles.store'), $articleData);

    $this->assertDatabaseHas('articles', [
      'title' => 'Test Article',
      'content' => 'Test Content',
    ]);

    $article = Article::where('title', 'Test Article')->first();
    $response->assertRedirect(route('articles.show', $article->slug));
  }

  // Tester la création d'un article sans les champs obligatoires
  public function test_article_requires_title_and_content()
  {
    $user = User::factory()->create();

    $response = $this->actingAs($user)
      ->post(route('articles.store'), [
        'title' => '',
        'content' => '',
      ]);

    $response->assertSessionHasErrors(['title', 'content']);
  }

  // Tester d'articles avec le même titre donc le même slug
  public function test_article_slug_is_unique()
  {
    $user = User::factory()->create();
    $existingArticle = Article::factory()->create(['title' => 'Test Article']);

    $response = $this->actingAs($user)
      ->post(route('articles.store'), [
        'title' => 'Test Article', // Same title should generate unique slug
        'content' => 'Different content',
      ]);

    $this->assertDatabaseCount('articles', 2);
    $this->assertNotEquals(
      $existingArticle->slug,
      Article::latest()->first()->slug
    );
  }
}
