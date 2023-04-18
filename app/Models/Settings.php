<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Settings
 *
 * @property int $id
 * @property string|null $logo
 * @property string|null $telegram_link
 * @property string|null $header_text
 * @property int $feature_categories_is_active
 * @property int $video_is_active
 * @property int $author_is_active
 * @property string|null $footer_text
 * @property string|null $category_default_image
 * @property string|null $article_default_image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Settings newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Settings newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Settings query()
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereArticleDefaultImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereAuthorIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereCategoryDefaultImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereFeatureCategoriesIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereFooterText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereHeaderText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereTelegramLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereVideoIsActive($value)
 * @mixin \Eloquent
 */
class Settings extends Model
{
    protected $guarded = [];
}
