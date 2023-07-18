<?php

namespace App\Models\Traits\Scope;

trait LeadScope
{
    public function scopeLeadSource($query, $id)
    {
        $query->where('lead_source_id', 'like', '%' . $id . '%');
    }
    public function scopeUser($query, $id)
    {
        if ($id != null)
        $query->where('user_id', 'like', '%' . $id . '%');
    }
    public function scopeCity($query, $id)
    {
        if ($id != null)
        $query->where('city_id', 'like', '%' . $id . '%');
    }

    public function scopeCreation_date($query, $id)
    {
        $query->where('creation_date', 'like', '%' . $id . '%');
    }
    public function scopeEntryUser($query, $id)
    {
        if ($id != null)
        $query->where('entry_user_id', 'like', '%' . $id . '%');
    }
    public function scopeHasComment($query, $id)
    {
        $query->where('has_comment', 'like', '%' . $id . '%');
    }
    public function scopeLeadStatus($query, $id)
    {
        $query->where('status_id', 'like', '%' . $id . '%');
    }
    public function scopeLeadType($query, $id)
    {
        $query->where('type_id', 'like', '%' . $id . '%');
    }
    public function scopeLeadProject($query, $id)
    {
        if ($id != null)
        $query->where('project_id', 'like', '%' . $id . '%');
    }
    public function scopeCampaign($query, $id)
    {
        if ($id != null)
            $query->where('campaign_id', 'like', '%' . $id . '%');
    }
    public function scopeCampaignUtmSource($query, $id)
    {
        if ($id != null)
            $query->where('campaign_utm_source_id', 'like', '%' . $id . '%');
    }
    public function scopeCampaignUtmMedium($query, $id)
    {
        if ($id != null)
        $query->where('campaign_utm_medium_id', 'like', '%' . $id . '%');
    }
    public function scopeCampaignUtmCampaign($query, $id)
    {
        if ($id != null)
        $query->where('campaign_utm_campaign_id', 'like', '%' . $id . '%');
    }
    public function scopeadditional_mobile_number($query, $id)
    {
        if ($id != null)
        $query->where('additional_mobile_number', 'like', '%' . $id . '%');
    }
    public function scopecomment($query, $id)
    {
        if ($id != null)
        $query->where('comment', 'like', '%' . $id . '%');
    }
    public function scopeaddress($query, $id)
    {
        if ($id != null)
        $query->where('address', 'like', '%' . $id . '%');
    }
    public function scopeemiratesId($query, $id)
    {
        if ($id != null)
        $query->where('emiratesId', 'like', '%' . $id . '%');
    }
    public function scopepassport_expiry($query, $id)
    {
        if ($id != null)
        $query->where('passport_expiry', 'like', '%' . $id . '%');
    }
    public function scopepassportId($query, $id)
    {
        if ($id != null)
        $query->where('passportId', 'like', '%' . $id . '%');
    }
}
