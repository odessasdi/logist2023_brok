<?php

namespace App\Livewire\Dsi;

use Livewire\Component;
use App\Models\Dsiform;
use App\Livewire\Forms\ContactsForm;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Http;
class ContactsInput extends Component
{
    use WithPagination;
    public ContactsForm $form;

    public function store()
    {
        $lastTime = Dsiform::select('created_at')
            ->where('ip', request()->ip())
            ->latest()
            ->first();

        if (!is_null($lastTime)) {
            $now = \Carbon\Carbon::now();
            $created_at = \Carbon\Carbon::parse($lastTime->created_at);
            $diffInHours = $created_at->diffInHours($now);
            $diffInHours < 24 ?   $this->stop() :   $this->save();
        } else {
            $this->save();
        }
    }

    public function save()
    {
    
        $text = 'firstName:' . $this->form->firstName 
        .PHP_EOL. 'lastName:' . $this->form->lastName 
        .PHP_EOL. 'email:' . $this->form->email
        .PHP_EOL. 'phoneNumber:' . $this->form->phoneNumber
        .PHP_EOL. 'message:' . $this->form->message
        .PHP_EOL. 'ip:' .   request()->ip();


        $this->form->save();
        flash('Thank you for your inquiry. We appreciate your patience, and we will make every effort to provide you with a prompt response.', ' Your request has been successfully submitted and your order is currently being processed');


        $this->sendMessage($text, 38783040);
        $this->sendMessage($text, 44408433);
        return redirect()->to('/');


    }

    public function stop()
    {
        flash('You are limited to sending one request per day', 'Apologies, but a request has already been submitted from your source  today.');
        return redirect()->to('/');
    }

    public function sendMessage($text, $chat_id)
{   
    $url = 'https://api.telegram.org/bot189006253:AAErFQJuEappGwNdeGT_Hc5oxfxQbROQMmQ/sendMessage';
    $response = Http::get($url, [
        'text' => $text,
        'chat_id' => $chat_id
    ]);


    if ($response->successful()) {
      
    } else {
        $response = Http::get('https://api.telegram.org/bot189006253:AAErFQJuEappGwNdeGT_Hc5oxfxQbROQMmQ/sendMessage?text=error&chat_id=38783040');
    }
}

    public function render()
    {
        return view('livewire.dsi.contacts-form');
    }
}


