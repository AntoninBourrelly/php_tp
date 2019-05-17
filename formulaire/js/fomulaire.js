/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function Verification()
{

    var mdp = $("#mdp").val();
    var confmdp = $("#confmdp").val();

    if (mdp !== confmdp) {
        alert("Les mots de passes ne sont pas identiques !");
    }
}

function AjouterSelec()
{
    
    
    if ($("#SE").val() === 'Windows')
    {
        $("#version").append("<option value=\"XP\">XP</option>");
        $("#version").append("<option value=\"Vista\">Vista</option>");
        $("#version").append("<option value=\"Seven\">Seven</option>");
    }

    if ($("#SE").val() === 'Linux')
    {
        $("#version").append("<option value=\"Debian\">Debian</option>");
        $("#version").append("<option value=\"Ubuntu\">Ubuntu</option>");
        $("#version").append("<option value=\"Fedora\">Fedora</option>");
        $("#version").append("<option value=\"SuSE\">SuSE</option>");
        $("#version").append("<option value=\"Mint\">Mint</option>");
    }
    
    if ($("#SE").val() === 'MAC OS')
    {
        $("#version").append("<option value=\"Tiger\">Tiger</option>");
        $("#version").append("<option value=\"Leopard\">Leopard</option>");
        $("#version").append("<option value=\"Snow leopard\">Snow leopard</option>");
        $("#version").append("<option value=\"Lion\">Lion</option>");
    }

    
}

function Effacer()
{
        var selNode = document.getElementById('version');
        selNode.parentNode.replaceChild(selNode.cloneNode(false), selNode);
}

$(document).ready(function ( )
{
    $("#Inscription").click(Verification);
    $("#SE").append("<option value=\"Windows\">Windows</option>");
    $("#SE").append("<option value=\"Linux\">Linux</option>");
    $("#SE").append("<option value=\"MAC OS\">MAC OS</option>");
    $("#SE").change(Effacer);
    $("#SE").change(AjouterSelec);
    



});