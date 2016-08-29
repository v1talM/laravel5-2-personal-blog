<?php

namespace App\Models;

use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Overtrue\Pinyin\Pinyin;

class Article extends Model
{
    use SoftDeletes;
    protected $fillable = [
      'title','slug','excerpt','thumbnail','content','origin_content','category_id','read_count','reply_count',
       'is_recommened' , 'order','published_at'
    ];
    protected $dates = ['published_at'];

    /**
     * Article constructor.
     * @param $markdown
     */

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (! $this->exists) {
            $this->attributes['slug'] = str_slug($value);
        }
    }

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d H:i:s',$date);
    }

    public function setSlugAttribute($value)
    {
        $pinyin = new Pinyin;
        $this->attributes['slug'] = $pinyin->permalink($value);
    }

    public function setExcerptAttribute($value)
    {
        $excerpt = strip_tags(Markdown::convertToHtml($value));
        $str_len = mb_strlen($excerpt);
        if($str_len > config('excerpt_length')) {
            $excerpt = mb_strcut($excerpt,0,512);
        }
        $this->attributes['excerpt'] = $excerpt;
    }

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = Markdown::convertToHtml($value);
    }

    public function scopeRecommened($query)
    {
        return $query->where('is_recommened', '=', 'yes');
    }

    public function scopeRecent($query)
    {
        return $query->where('published_at','<=',Carbon::now());
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag','article_tag_pivot')->withTimestamps();
    }
}
