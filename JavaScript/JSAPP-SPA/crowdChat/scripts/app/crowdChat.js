define("crowdChat",["jquery","handlebars","underscore"],function ($,Handlebars,underscore) {
		
	var crowdChat;	
	crowdChat = (function () {
		function crowdChat() {
			this.SOURCE_URL = "http://crowd-chat.herokuapp.com/posts";
			this.UPDATE_TIME = 20000;
			this.MAX_NUMBER_OF_POSTS = 100;
			this.TEMPLATE_ID = "#template-container";
			this.userName = undefined;
			this.history = "";
			this.intervalID = undefined;
			this.template = undefined;
		}
		
	
		crowdChat.prototype = {
			init : function () {
				var that = this;
				if (localStorage.getItem("username") === null) {					
					$("#btn-log").on("click",function (){
						var newName = $("#user-name")[0].value;
						if (newName){
							that.userName = newName;
							localStorage.setItem("username",that.userName);
							that.logIn();
						} else {
							$("#error").html("Please enter user name")
								.fadeOut(5000);
						}
						
					});				
				}else {
					this.userName = localStorage.getItem("username");
					this.logIn();					
				}
				var messages = this.getMessages();
				messages.done(function (data,message,httpRQST) {
					that.loadMessagesInTemplate(httpRQST.responseText);
				});
				
				var htmlTemplate = $(this.TEMPLATE_ID).html();				
				this.template = Handlebars.compile(htmlTemplate);	
				this.updateMessages();
				
			},
			logIn : function () {				
				$("#user").html(this.userName + "!");
				$("#error").html("");
				$("#log-panel").css("display","none");
				var that = this;
				$("#btn-send").on("click",function (){
					that.sendMessage();
				});								
			},
			sendMessage : function () {			
				 
				var text = $("#user-input").val();				
			
				var user = this.userName;
				var that = this;
				
				if (text) {
					$.ajax({
						url:this.SOURCE_URL,
						type:"POST",
						data: {
							"user": user, 
							"text": text
						},
						success: function(data) {
							var messages = that.getMessages();
							messages.done(function (data,message,httpRQST) {
								that.loadMessagesInTemplate(httpRQST.responseText);
							});
						},
						error : function(error) {
							$("#error").html("Problem connection to server" + error);
						}
					});
				} else {
					$("#error").html("Cannot send empty messages.Please type text.")
						.fadeOut(5000);
				}				
			},			 
			loadMessagesInTemplate : function (messages){				
				var escaped = _.unescape(messages);
				
				var allMessages = JSON.parse(messages);
				var lastMesseges = allMessages.slice(-100);		
				
				var messegesHTML = this.template({
					message : lastMesseges
				});
				
				$("#messages-container").html(messegesHTML);
				$("#messages-container").scrollTop($("#messages-container")[0].scrollHeight);
				
			}, 
			updateMessages :function (){
				var that = this;
				this.intervalID = setInterval (function (){
					var messages = that.getMessages();
					messages.done(function (data,message,httpRQST) {
						if (that.history.localeCompare(httpRQST.responseText)) {
							that.history = httpRQST.responseText;															
							that.loadMessagesInTemplate(httpRQST.responseText);
						}					
					});					
										
				},this.UPDATE_TIME);				
			},
			getMessages : function () {
				var that =this;
				var promise = $.ajax ({
					url :that.SOURCE_URL,
					type : "GET",					
					error:function (error) {
						$("#error").html("Problem connection to server" + error).fadeOut(5000);
					},
				});
				return promise;
			}
		};			
		
		return crowdChat;
		
	} ());
	return crowdChat;
});