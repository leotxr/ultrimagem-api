<?php

namespace App\Livewire\Leads;

use Livewire\Component;
use App\Models\Lead;
use App\Jobs\SendEmail;
use App\Models\LeadType;
use App\Models\File;

class FireLeads extends Component
{
    public $attachment;
    public $leads;
    public $count_leads = 0;
    public $types;
    public $type_id = 0;
    public $subject = '';
    public $message = '';

    public function mount()
    {
        $this->leads = Lead::all();
        $this->types = LeadType::all();
    }

    public function selectType($type_id)
    {
        $this->type_id = $type_id;
        $this->count_leads = Lead::where('lead_type_id', $type_id)->count();
    }

    public function fire()
    {
        $details = [
            'subject' => $this->subject,
            'message' => $this->message,
            'attachment' => $this->attachment
        ];
        SendEmail::dispatch($details);
    }

    public function render()
    {
        $this->count_leads = Lead::where('lead_type_id', $this->type_id)->count();
        return view('livewire.leads.fire-leads', ['files' => File::where('file_type_id', 1)->get()]);
    }
}
