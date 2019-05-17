/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




function PostRougelogin()
{
    $("#loginPost").css("border-color","red");
    $("#loginPost").css("border-width","3px");
    
}

function PostNoirlogin()
{
    $("#loginPost").css("border-color","black");
    $("#loginPost").css("border-width","1px");
}


function PostRougemdp()
{
    $("#motDePassePost").css("border-color","red");
    $("#motDePassePost").css("border-width","3px");
}

function PostNoirmdp()
{
    $("#motDePassePost").css("border-color","black");
    $("#motDePassePost").css("border-width","1px");
}


document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('body').classList.add('is-ready');
}, false);

$(document).ready(function()
{
    
   
    
    $("#loginPost").mouseover(PostRougelogin);
    $("#loginPost").mouseout(PostNoirlogin);
    
    $("#motDePassePost").mouseover(PostRougemdp);
    $("#motDePassePost").mouseout(PostNoirmdp);
    
});