@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <chat :messages="messages"></chat>
                    <form-component 
                    v-on:messagesent="addMessage"
                    :user_id={{ Auth::user()->id }}
                    :name="'{{ Auth::user()->name }}'">
                    </form-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('bottom')
<script>
// Enable pusher logging - don't include this in production
// Pusher.logToConsole = true;

// var pusher = new Pusher('e872f774be2050909bec', {
//   cluster: 'ap1',
//   forceTLS: true
// });

// var channel = pusher.subscribe('chat');
// channel.bind('App\\Events\\MessageSent', function(data) {
//     console.log(data);
//     $('.chat-list').append(`
//         <li class="person-chat">
//             <div class="meta-group-chat">
//                 <p class="meta-chat-name">`+ data.message.user.name +`</p>
//                 <p class="meta-chat-message">`+ data.message.content +`</p>
//             </div>
//         </li>
//     `);
// });
</script>
@endpush