



function conncet_db(){
	var MongoClient = require('mongodb').MongoClient;
	var format = require('util').format;
	
	MongoClient.conncet('mongodb://127.0.0.1:27017',function(err,db){
		
		if(err){
			throw err;
		}else{
		window.alert("Connected");}
		
		db.close();
	});
		
}