<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\sub_categories;

use Illuminate\Database\Eloquent\Factories\Factory;

class sub_categoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = sub_categories::class;
    public function definition()
    {
        return [
            'category_id' => Category::factory()->create()->id,
            'category_name' =>  Category::factory()->create()->title,
            'slug' => $this->faker->word,
            'meta_title' => $this->faker->word,
            'meta_description' => $this->faker->word,
            'meta_keywords' => $this->faker->word
        ];
    }

    /**
     * Set the category name dynamically.
     *
     * @param string $categoryName
     * @return $this
     */
    public function withCategoryName(string $categoryName)
    {
        return $this->afterMaking(function (sub_categories $subCategory) use ($categoryName) {
            $category = Category::where('title', $categoryName)->first();
            if ($category) {
                $subCategory->category_id = $category->id;
            }
        });
    }
}
