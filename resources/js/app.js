const { default: Echo } = require('laravel-echo');

require('./bootstrap');

$('form').on('sunmit',function(){
    $(this).find('input[type=submit]').attr('disabled',true);
});

Echo.channel('messages-channel')
    .listen('MwssageWasReceived',(data)=>{
        console.log(data);
    })