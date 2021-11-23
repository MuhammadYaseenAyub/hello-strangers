/*const express = require('express');

const app = express();

const server = require('http').createServer(app);

const io = require('socket.io')(server, {
    cors: {origin:"*"}
});

io.on('connection', (socket) => {
    console.log('connection');

    socket.on('sendChatToServer', (message)=>{
        console.log(message);
        //io.sockets.emit('sendChatToClient', message);
        socket.broadcast.emit('sendChatToClient', message);
    });

    socket.on('disconnect',(socket) => {
        console.log('Disconnect');
    });
});

server.listen(3000, () => {
    console.log('Server is running....');
});*/
const {generateMessage, generateLocationMessage} = require('./message');
const express = require('express');
const app = express();
const socket = require('socket.io');
const server = require('http').createServer(app);
const port = process.env.PORT || 3000;
const io = require('socket.io')(server, {
    cors: {origin:"*"}
});

io.on('connection', (socket) =>{
    console.log('A new User Just Connected');

    socket.emit('newMsg', generateMessage('Admin', 'Welcome to chat app.'));

    socket.broadcast.emit('newMsg', generateMessage('Admin', 'New user joined'));

    socket.on('createMsg', (message, callback)=>{
        console.log('createMsg :> ', message);
        io.emit('newMsg', generateMessage(message.from, message.text));
        callback('this is the server: ');
        /*socket.broadcast.emit('newMsg', {
            from:message.from,
            text:message.text,
            createdAt: new Date().getTime()
        });*/
    });

    socket.on('createLocMsg', (cords)=>{
        io.emit('newLocMsg', generateLocationMessage('Admin', cords.lat, cords.long));
    });

    socket.on('disconnect', () => {
        console.log("user was disconnected ....");
    });
});


server.listen(port, ()=>{
    console.log('Server is UP on port '+port);
});
