@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="user-wrapper">
                <ul class="users">

                    @foreach ($user as $users)
                    <li class="user" id="{{$users->id}}">

                        @if ($users->unread)
                            <span class="pending">{{$users->unread}}</span>
                        @endif
                        

                            <div class="media">
                                <div class="media-left">
                                    <img src="{{$users->avatar}}" alt="" class="media-object">
                                </div>

                                <div class="media-body">
                                    <p class="name">{{$users->name}}</p>
                                    <p class="email">{{$users->email}}</p>
                                </div>
                            </div>
                    </li>
                    @endforeach
                    
                </ul>
            </div>
        </div>
        <div class="col-md-8" id="messages">
            
        </div>
    </div>
</div>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    var receiver_id = '';
    var my_id = {{ Auth::User()->id }};
    // alert(my_id);
    $(document).ready(function(){
         // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('994821fce8e4ea401c37', {
          cluster: 'ap2'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
          // alert(JSON.stringify(data));
          if (my_id == data.from) {
            $('#'+data.to).click();
          }else if(my_id == data.to){

                if (receiver_id == data.from) {
                    //if receiver is selected reload the selected user;
                    $('#'+data.from).click();
                } else{
                    //if receiver is not selected add notification for that user;
                    var pending = parseInt($('#'+data.from).find('.pending').html());

                    if(pending){
                        $('#'+data.from).find('.pending').html(pending+1);
                    }else{
                        $('#'+data.from).append('<span class="pending">1</span>')
                    }
                }
          }
        });


        $('.user').click(function(){
            $('.user').removeClass('active');
            $(this).addClass('active');
            $(this).find('.pending').remove();

            receiver_id = $(this).attr('id');
            // alert(receiver_id);
            $.ajax({
                type:'get',
                url: 'message/' + receiver_id,
                data:'',
                cache:false,
                success: function (data){
                    $('#messages').html(data);
                    scrollToBottomFunc();
                }

            });
        });

    


        $(document).on('keyup', '.input-text input', function (e) {
            var message = $(this).val();

            if(e.keyCode == 13 && message != '' && receiver_id != '')
            {
                // alert(message);
                $(this).val('');
                datastr = 'receiver_id=' + receiver_id + '&message=' + message;
                $.ajax({
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'message',
                    data:datastr,
                    cache:false,
                    success:function (data){

                    },
                    error:function (jqXHR, status, err){

                    },
                    complete:function (){
                        scrollToBottomFunc();
                    },
                });
            }
        });
    });

    // make a function to scroll down auto
    function scrollToBottomFunc() {
        $('.message-wrapper').animate({
            scrollTop: $('.message-wrapper').get(0).scrollHeight
        }, 50);
    }
</script>

@endsection
