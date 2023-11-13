<?php

namespace App\Livewire\Leads;

use Livewire\Component;
use App\Models\Lead;

class ShowLeads extends Component
{
    public $leads;
    public Lead $deleted;
    public $delete_list = [];
    public $modal_delete = true;

    public function mount()
    {
        $this->leads = Lead::all();
    }

    public function deleteLeads()
    {

        foreach ($this->delete_list as $lead) {
            $deleted = Lead::find($lead);
            $deleted->delete();
        }
        return redirect()->to('/leads');
    }

    public function render()
    {
        return view('livewire.leads.show-leads');
    }
}
