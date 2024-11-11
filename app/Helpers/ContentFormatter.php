<?php

namespace App\Helpers;

use Carbon\Carbon;

class ContentFormatter
{
    public static function formatArticle($article, $fullContent = false)
    {
        $article['image_preview'] = asset('storage/' . $article['image_preview']);
        $article['image_header'] = asset('storage/' . $article['image_header']);
        $article['image_content'] = json_decode($article['image_content']);
        $article['image_content'] = array_map(fn($image) => asset('storage/' . $image), $article['image_content']);

        $article['category_name'] = $article['category']['name'] ?? 'No Category';
        $article['created_at'] = Carbon::parse($article['created_at'])->format('d M Y');
        $article['updated_at'] = Carbon::parse($article['updated_at'])->format('d M Y');
        $ratings = $article['ratings'];
        $averageRating = !empty($ratings) ? number_format(array_sum(array_column($ratings, 'rating')) / count($ratings), 1) : '0.0';
        $article['average_rating'] = $averageRating;
        $ratingCount = count($ratings);
        $article['rating_count'] = $ratingCount;

        if ($fullContent) {
            $article['content'] = $article['content'];
        } else {
            preg_match('/<p>(.*?)<\/p>/', $article['content'], $matches);
            if (!empty($matches[1])) {
                $firstParagraph = strip_tags($matches[1]);
                $words = explode(' ', $firstParagraph);
                $first12Words = array_slice($words, 0, 18);
                $article['content'] = implode(' ', $first12Words);
            } else {
                $article['content'] = 'No content available';
            }
        }

        unset($article['category_id'], $article['category']);

        return $article;
    }

    public static function formatProduct($product, $fullDescription = false)
    {
        $product['image_preview'] = asset('storage/' . $product['image_preview']);
        $product['image_header'] = asset('storage/' . $product['image_header']);
        $product['image_content'] = json_decode($product['image_content']);
        $product['image_content'] = array_map(fn($image) => asset('storage/' . $image), $product['image_content']);
        $product['category_name'] = $product['category']['name'] ?? 'No Category';
        $product['created_at'] = Carbon::parse($product['created_at'])->format('d M Y');
        $product['updated_at'] = Carbon::parse($product['updated_at'])->format('d M Y');
        $product['price'] = number_format($product['price'], 0, ',', '.');

        if ($fullDescription) {
            $product['description'] = $product['description'];
        } else {
            preg_match('/<p>(.*?)<\/p>/', $product['description'], $matches);
            $firstSentence = !empty($matches[1]) ? explode('.', strip_tags($matches[1]))[0] . '.' : 'No description available';
            $product['description'] = $firstSentence;
        }

        unset($product['category_id']);

        return $product;
    }
}
