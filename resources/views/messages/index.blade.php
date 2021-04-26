
<style>
    
.card-container {
   /*  background-color: #231E39;
   border-radius: 5px;
   box-shadow: 0px 10px 20px -10px rgba(0,0,0,0.75);
   color: #B3B8CD;
   padding-top: 30px;
   position: relative;*/
   /*width: 350px;*/
   width: 100%;
   text-align: center;
   }
   .card-container .round {
   border: 1px solid #03BFCB;
   border-radius: 50%;
   padding: 7px;
   }
 </style>  <!-- Header -->
   <div id="backDiv">
   <div style="position: fixed; top:0" class="header header-small">
        <div class="top-profile">
            <div class="profile">
                <a id="backBtn" href="#" class="back-btn"><img src="assets/img/icons/arrow.png" alt=""></a>
                <a href="#" class="profile">
                <span class="avatar"><img class="receiverimg" src="assets/img/avatar-1.jpg" alt=""></span>
                   <span class="receiver_name"></span><span id="active_status" ><small style="float:left;top:50px; left:103px;position: fixed;"></small></span>
                </a>
            </div>
            <div class="search call-action">
                <a href="video-call.html"><img src="assets/img/icons/video.png" alt=""></a>
                <a href="voice-call.html"><img src="assets/img/icons/call.png" alt=""></a>
            </div>
        </div>
   </div>
   <!-- /Header -->
    <div class="main-wrapper messages-content chat-bg">
            <div style="margin-top: 20%;">
                <div class="card-container">
                   <img height="150" width="150" class="round receiverimg" src="/backend/img/messanger.png" alt="user" />
                   <h3 class="receiver_name"></h3>
                   <p>Start with new message!</p>
                </div>
             </div>

            <div class="messages">
                @foreach ($messages as $message)
                <div class=" {{ $message->from == Auth::User()->id ? 'message message-sent message-first' : 'message message-received message-first' }}">
                    <div class="message-content">
                        <div class="message-bubble">
                            <div class="message-text">{{ $message->message }}</div>
                        </div><br>
                        <div class="message-footer">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</div>
                    </div>
                </div>
                @endforeach
                <br><br><br>
            </div>
    </div>
       
    {{-- @include('backendlayout.emoji') --}}
   </div>
    <script>
        $( "div.message-bubble" ).last().css( "margin-bottom", "50px" );
        // $( "div.message-footer" ).last().css( "margin-bottom", "50px" );
       $('#backBtn').click(function(){
            $('#mian_div').show();
            $('#backDiv').hide();
            $('#InputDiv').hide();
       });
    </script>
    <script>
    $('#test').click(function(){
        // alert(receiver_id)
        var message = $('#input_area').val();
   
           if( message != '' && receiver_id != '')
           {
               // alert(message);
               $('#input_area').val('');
                $('#sent_sound').click();
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
</script>