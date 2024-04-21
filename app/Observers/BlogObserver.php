<?php

namespace App\Observers;

use App\Models\Blog;
use App\Models\Status;

class BlogObserver
{
    public function saving(Blog $blog): void
    {
        if (request()->has('is_published') && request()->is_published == true) {
            $blog->published_at = now();
            $blog->status_id = Status::PUBLISHED;
        }
        if (!request()->has('is_published') && request()->is_published == false) {
            $blog->status_id = Status::NOT_PUBLISHED;
        }
    }
}
