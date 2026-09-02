<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->boolean('is_default')->default(false);
            $table->boolean('is_active')->default(true);
            // Branding overrides (logo, colors, fonts) — JSON, merged over global settings
            $table->json('config')->nullable();
            $table->timestamps();
        });

        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('theme_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('status')->default('draft'); // draft | published
            // Ordered list of block instances: [{id, type, props}]
            $table->json('blocks')->nullable();
            $table->json('seo')->nullable(); // meta_title, meta_description, og_image
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        // Registry of available block types (the "component library")
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category')->default('General');
            $table->text('description')->nullable();
            $table->string('icon')->nullable(); // heroicon name
            // JSON schema: array of field definitions (type, name, label, options, default...)
            $table->json('schema')->nullable();
            $table->json('default_props')->nullable();
            $table->json('settings')->nullable(); // display styles, allowed themes
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Custom collections (WordPress-CPT style: user-defined content types)
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            // JSON array of field definitions: [{name, label, type, options}]
            $table->json('fields')->nullable();
            $table->json('settings')->nullable(); // e.g. has_single_page, list_style
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('collection_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collection_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('status')->default('draft'); // draft | published
            $table->json('data')->nullable();
            $table->unsignedInteger('sort')->default(0);
            $table->timestamps();

            $table->index(['collection_id', 'status', 'sort']);
        });

        // User-submitted stories with admin approval workflow
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('body');
            $table->string('image')->nullable();
            $table->string('status')->default('pending'); // pending | approved | rejected
            $table->text('review_note')->nullable();
            $table->boolean('featured')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->index(['status', 'published_at']);
        });

        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('location')->nullable(); // header | footer
            // JSON tree: [{label, url, children: []}]
            $table->json('items')->nullable();
            $table->timestamps();
        });

        // Persisted contact form submissions
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('subject')->nullable();
            $table->text('message');
            $table->boolean('read')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('stories');
        Schema::dropIfExists('collection_items');
        Schema::dropIfExists('collections');
        Schema::dropIfExists('blocks');
        Schema::dropIfExists('pages');
        Schema::dropIfExists('themes');
    }
};
