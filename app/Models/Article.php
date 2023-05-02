<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Article
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property string|null $image
 * @property string|null $tags
 * @property int $status
 * @property int $view_count
 * @property int $like_count
 * @property int $read_time
 * @property string|null $publish_date
 * @property string|null $seo_keywords
 * @property string|null $seo_description
 * @property int $user_id
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Article category($category_id)
 * @method static \Database\Factories\ArticleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article publishDate($publish_date)
 * @method static \Illuminate\Database\Eloquent\Builder|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|Article status($status)
 * @method static \Illuminate\Database\Eloquent\Builder|Article user($user_id)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereLikeCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article wherePublishDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereReadTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereViewCount($value)
 * @mixin \Eloquent
 */
class Article extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];

    public function getTagsAttribute():array|false
    {
        return explode(",", $this->attributes['tags']);
    }

    public function category():HasOne
    {
        return $this->hasOne(Category::class, "id","category_id");
    }

    public function user():HasOne
    {
        return $this->hasOne(User::class, "id","user_id");
    }

    public function comments():HasMany
    {
        return $this->hasMany(ArticleComment::class, "article_id","id");
    }

    public function scopeStatus($query, $status)
    {
        if (!is_null($status))
        {
            return $query->where("status", $status);
        }
    }

    public function scopeCategory($query, $category_id)
    {
        if (!is_null($category_id))
        {
            return $query->where("category_id", $category_id);
        }
    }

    public function scopeUser($query, $user_id)
    {
        if (!is_null($user_id))
        {
            return $query->where("user_id", $user_id);
        }
    }

    public function scopePublishDate($query, $publish_date)
    {
        if (!is_null($publish_date))
        {
            $publish_date = Carbon::parse("publish_date")->format("Y-m-d H:i:s");
            $query->where("publish_date", $publish_date);
        }
    }


}
