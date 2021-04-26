<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamschat-framework7.dreamguystech.com/template-bootstrap/chat.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Nov 2020 09:13:19 GMT -->
<head>
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">
    <title>Welcome to Ashirbaad messanger</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <style>
       .pending {
           position: absolute;
           right: 18px;
           top: 25px;
           background: #27ae60;
           margin:0;
           border-radius: 50%;
           height: 22px;
           width: 22px;
           line-height: 18px;
           padding-left: 7px;
           padding-top: 2px;
           color: #ffffff;
           font-size: 12px;
           }
           ::-webkit-scrollbar {
              display: none;
          }
    </style>

</head>

<body>

    <div id="mian_div" class="main-wrapper chat-bg">

        <!-- Header -->
       <div class="header">
            <div class="top-profile">
                <a href="profile.html" class="profile">
                    <span class="avatar"><img src="/assets/img/users/{{Auth::User()->avatar}}" alt=""></span>
                    Hi, {{Auth::User()->name}}
                </a>
                <div class="search">
                    <a href="#" class="search-icon"><img src="assets/img/icons/search.png" alt=""></a>
                    <a href="#" data-toggle="dropdown" aria-expanded="true"><img src="assets/img/icons/hamburger-icon.svg" alt=""></a>
                    <div class="dropdown-menu dropdown-menu-right header_drop_icon">
                        <a href="create-group-profile.html" class="dropdown-item">New Group</a>
                        <a href="contacts.html" class="dropdown-item">Contacts</a>
                        <a href="settings.html" class="dropdown-item">Settings</a>
                    </div>
                </div>
                <div class="search_chat has-search">
                    <span class="fas fa-search form-control-feedback"></span>
                    <span class="close-search"><i class="far fa-times-circle"></i></span>
                    <input class="form-control chat_input" id="search-contact" type="text" placeholder="">
                </div>
            </div>
            <ul class="navbar">
                <li class="nav-item">
                    <a class="nav-link camera-icon" href="#">
                        <img src="assets/img/icons/camera.png" alt="">
                    </a>
                    <input type="file" name="photo" class="custom-file-upload" />
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Chat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Group</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Call</a>
                </li>
            </ul>
            <div class="add-new-btn">
                <a href="#"><i class="fas fa-plus"></i></a>
            </div>
       </div>
       <!-- /Header -->
        
        <div class="chat-list-col">
            <div class="container">
                <div class="person-list">
                    <ul>
                        @foreach ($user as $users)
                           <li class="user  person-list-item col-12" id="{{$users->id}}" data-image="/assets/img/users/{{$users->avatar}}" data-name="{{$users->name}}">
                            <a href="#">
                                <div class="avatar avatar-online">
                                    <img src="/assets/img/users/{{$users->avatar}}" width="48" alt="">
                                </div>
                                @if ($users->unread)
                                   <span class="pending">{{$users->unread}}</span>
                                   @endif
                                <div class="person-list-body">
                                    <div>
                                        <h5>{{$users->name}}</h5>
                                        <p {{-- class="read" --}}>{{$users->email}}</p>
                                    </div>
                                    {{-- <div class="last-chat-time"><small class="text-muted">09:25 AM</small></div> --}}
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

         <audio id="audio" src="assets/mp3/notiifcation.mp3" autostart="false" ></audio>
         <p style="display: none" onclick="PlaySound()" id="sound"> Play</p>
         <audio id="sentAudio" src="assets/mp3/sent.mp3" autostart="false" ></audio>
         <p style="display: none" onclick="PlaySentSound()" id="sent_sound"> Play</p>
    <div id="messages">
        
    </div>
     <div id="InputDiv" class="messages-content">
            <div class="toolbar messagebar">
            <div class="toolbar-inner">
                <div class="messagebar-area input-text"> 
                    <textarea id="input_area" class="test-emoji" placeholder="Type your message"></textarea>
                </div>
                <div class="media-buttons">
                    <ul>
                        <li>
                            <button style="border: none;background: white;" id="test"><i style="color:#650681; font-size:30px" class="fa fa-paper-plane"></i></button>
                        </li>
                        {{-- <li>
                            <a href="#"><img src="assets/img/icons/voice-record.png" alt=""></a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
      </div>

    <!-- jQuery -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    
$('#InputDiv').hide();
   var receiver_id = '';
   var my_id = {{ Auth::User()->id }};
   $(document).ready(function(){
        // Enable pusher logging - don't include this in production
       Pusher.logToConsole = true;
   
       var pusher = new Pusher('dd04d60f3a4eb1cc2fb6', {
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
                      $('#sound').click();
                   
               } else{
                    $('#active_status').show();
                   //if receiver is not selected add notification for that user;
                   var pending = parseInt($('#'+data.from).find('.pending').html());
   
                   if(pending){
                      $('#sound').click();
                       $('#'+data.from).find('.pending').html(pending+1);
                   }else{
                      $('#sound').click();
                       $('#'+data.from).append('<span class="pending">1</span>');
                        $('#active_status').html('');
                   }
               }
         } 
       });
   
   
       $('.user').click(function(){
        $('#mian_div').hide();
        $('#InputDiv').show();
           $('.user').removeClass('active');
           $(this).addClass('active');
           $(this).find('.pending').remove();
   
           receiverimg = $(this).data('image');
           receiver_name = $(this).data('name');
   
           receiver_id = $(this).attr('id');
           $.ajax({
               type:'get',
               url: 'message/' + receiver_id,
               data:'',
               cache:false,
               success: function (data){
                   $('#messages').html(data);
                   $('.receiverimg').attr('src',receiverimg)
                   $('.receiver_name').html(receiver_name);
                   scrollToBottomFunc();
                   // $('#input_area').focus();
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
                       // $('#input_area').focus();
   
                   },
               });
           }
       });
   });
   

   
   $(function(){
   if ($('#ms-menu-trigger')[0]) {
       $('body').on('click', '#ms-menu-trigger', function() {
           $('.ms-menu').toggleClass('toggled'); 
       });
   }
   });
   $('.media').click(function()
   {
    $('.ms-menu').toggleClass('toggled'); 
   });

   
</script>
<script>
   function PlaySound() {
         var sound = document.getElementById("audio");
         sound.play();
     }
     function PlaySentSound() {
         var a_sound = document.getElementById("sentAudio");
         a_sound.play();
     }
     // make a function to scroll down auto
   function scrollToBottomFunc() {
       // $('.message-wrapper').animate({
       //     scrollTop: $('.message-wrapper').get(0).scrollHeight
       // }, 50);
       $("html, body").animate({ scrollTop: $(document).height() }, 10);
   }
</script>
    
</body>


<!-- Mirrored from dreamschat-framework7.dreamguystech.com/template-bootstrap/chat.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Nov 2020 09:13:24 GMT -->
</html>