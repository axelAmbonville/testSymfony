var io = require("socket.io").listen(8765); 
var nbgens=0;
var last_message;
var test=new Array();


io.sockets.on('connection',function(client){

	
	client.on("jarrive",function(pseudo){
		client.emit("last_msg",test);
	});

	client.emit("tujoin",'Vous avez rejoint la salle..')
	client.on("message",function(lemessage){
		console.log(lemessage.user +' = '+ lemessage.message );
		io.sockets.emit("message_pour_tous",lemessage);
		last_message=lemessage;
		test.push(last_message);
	});
});