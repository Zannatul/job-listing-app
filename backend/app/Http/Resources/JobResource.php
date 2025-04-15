<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'title'         => $this->title,
            'description'   => $this->description,
            'company_name'  => $this->company_name,
            'view_count'    => $this->view_count,
            'applications'  => $this->applications()->count(),
            'created_at'    => $this->created_at,
        ];
    }
}
