<?php

namespace Fleetbase\FleetOps\Http\Resources\v1;

use Fleetbase\FleetOps\Support\Utils;
use Fleetbase\Http\Resources\FleetbaseResource;
use Fleetbase\Support\Http;

class Vendor extends FleetbaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return array_merge(
            $this->getInternalIds(),
            [
                'id'                   => $this->when(Http::isInternalRequest(), $this->id, $this->public_id),
                'uuid'                 => $this->when(Http::isInternalRequest(), $this->uuid),
                'public_id'            => $this->when(Http::isInternalRequest(), $this->public_id),
                'place_uuid'           => $this->when(Http::isInternalRequest(), $this->place_uuid),
                'connect_company_uuid' => $this->when(Http::isInternalRequest(), $this->connect_company_uuid),
                'logo_uuid'            => $this->when(Http::isInternalRequest(), $this->logo_uuid),
                'type_uuid'            => $this->when(Http::isInternalRequest(), $this->type_uuid),
                'internal_id'          => $this->internal_id,
                'business_id'          => $this->business_id,
                'name'                 => $this->name,
                'email'                => $this->email,
                'phone'                => $this->phone,
                'photo_url'            => Utils::or($this, ['logo_url', 'photo_url']),
                'place'                => $this->whenLoaded('place', new Place($this->place)),
                'address'              => $this->when(Http::isInternalRequest(), data_get($this, 'place.address')),
                'address_street'       => $this->when(Http::isInternalRequest(), data_get($this, 'place.street1')),
                'type'                 => $this->type,
                'meta'                 => $this->meta ?? [],
                'slug'                 => $this->slug,
                'updated_at'           => $this->updated_at,
                'created_at'           => $this->created_at,
            ]
        );
    }

    /**
     * Transform the resource into an webhook payload.
     *
     * @return array
     */
    public function toWebhookPayload()
    {
        return [
            'id'             => $this->public_id,
            'internal_id'    => $this->internal_id,
            'name'           => $this->name,
            'email'          => $this->email,
            'phone'          => $this->phone,
            'photo_url'      => Utils::or($this, ['logo_url', 'photo_url']),
            'place'          => $this->whenLoaded('place', new Place($this->place)),
            'address'        => data_get($this, 'place.address'),
            'address_street' => data_get($this, 'place.street1'),
            'type'           => $this->type,
            'meta'           => $this->meta ?? [],
            'slug'           => $this->slug,
            'updated_at'     => $this->updated_at,
            'created_at'     => $this->created_at,
        ];
    }
}
