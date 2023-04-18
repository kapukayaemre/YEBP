<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $color
 * @property int $status
 * @property string|null $image
 * @property int $feature_status
 * @property string|null $description
 * @property int|null $parent_id
 * @property string $order
 * @property string|null $seo_keywords
 * @property string|null $seo_description
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Category|null $parentCategory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Category description($description)
 * @method static \Database\Factories\CategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Category featureStatus($feature_status)
 * @method static \Illuminate\Database\Eloquent\Builder|Category name($name)
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category order($order)
 * @method static \Illuminate\Database\Eloquent\Builder|Category parentCategory($parentID)
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category slug($slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Category status($status)
 * @method static \Illuminate\Database\Eloquent\Builder|Category user($userID)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereFeatureStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUserId($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];

    protected $casts = ['order' => 'string'];

    protected $hidden = ['created_at'];

    public function scopeName($query, $name)
    {
        if (!is_null($name))
            return $query->where("name", "LIKE", "%" . $name . "%");
    }
    public function scopeDescription($query, $description)
    {
        if (!is_null($description))
            return $query->where("description","LIKE","%". $description ."%");
    }
    public function scopeSlug($query, $slug)
    {
        if (!is_null($slug))
            return $query->where("slug","LIKE","%". $slug ."%");
    }
    public function scopeOrder($query, $order)
    {
        if (!is_null($order))
            return $query->where("order", $order);
    }
    public function scopeStatus($query, $status)
    {
        if (!is_null($status))
            return $query->where("status","LIKE","%". $status ."%");
    }
    public function scopeFeatureStatus($query, $feature_status)
    {
        if (!is_null($feature_status))
            return $query->where("feature_status", "LIKE", "%" . $feature_status . "%");
    }
    public function scopeParentCategory($query, $parentID)
    {
        if (!is_null($parentID))
            $query->where("parent_id",$parentID);
    }
    public function scopeUser($query, $userID)
    {
        if (!is_null($userID))
            $query->where("parent_id",$userID);
    }

    public function parentCategory():HasOne
    {
        return $this->hasOne(Category::class, "id", "parent_id");
    }

    public function user():HasOne
    {
        return $this->hasOne(User::class, "id","user_id");
    }

    public function articles():HasMany
    {
        return $this->hasMany(Article::class, "category_id","id");
    }

    public function articlesActive():HasMany
    {
        return $this->hasMany(Article::class, "category_id","id")
            ->where("status",1)
            ->whereNotNull("publish_date")
            ->where("publish_date","<=",now());
    }

}
