

<div class="" id="">
    <div class="row chat-window col-xs-5 col-md-3 " id="chat_window_1" style="float:right;z-index:9000;bottom:0;
    right:0;
    position:fixed;
    float:right;
    margin-left:20px;">
        <div class="col-xs-12 col-md-12 cbox-hidden " id="chat5">
        	<div class="panel panel-default bg-danger ">
                <div class="panel-heading top-bar " style="background:#fff;">
                    <div class="col-md-8 col-xs-8 ">
                        <h3 class="panel-title text-primary" style="font-weight:600;font-size:20px;">Admin</h3>
                    </div>
                    <div class="col-md-4 col-xs-4" style="text-align: right;">
                        <a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim "></span></a>
                        <a href="#" onclick="document.getElementById('chat5').style.display='none'"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>
                    </div>
                </div>
                <div id="msg-body" class="panel-body msg_container_base" style=" background: #e5e5e5;
  margin: 0;
  padding: 0 10px 10px;
  max-height:400px;
  overflow-x:hidden;">
                    
                </div>
                <div class="panel-footer">
                    <div class="input-group" style="width: 85%">
                        <input id="msg" style="margin-left:-10px" type="text" style="font-size:14px;" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                        <span class="input-group-btn">
                        <button class="btn btn-success" style="padding:17px" id="btn-chat" onclick="send()">Send</button>
                        </span>
                    </div>
                </div>
    		</div>
        </div>
    </div>
    
   
</div>
