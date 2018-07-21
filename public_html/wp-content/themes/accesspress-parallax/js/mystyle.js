jQuery(window).load(function(){
    jQuery('#loader').fadeOut(1000);
    jQuery('body').css('overflow-y', 'scroll');
    jQuery('html').css('overflow-y', 'scroll');
})

jQuery(".btn-wrap > a").attr("href", "http://www.kiitelabs.com/blogs/");
jQuery(".menu-item-146 > a").removeAttr("href");
jQuery(".menu-item-146 > a").css('cursor', 'pointer');

jQuery('#button_team').click(function(){
    var team = document.getElementById('team'); 
    var alumni = document.getElementById('alumni'); 
    var button_team = document.getElementById('button_team'); 
    var button_alumni = document.getElementById('button_alumni'); 
    team.style.display='block'; 
    alumni.style.display='none';
    button_alumni.style.backgroundColor = 'rgba(250, 250, 250, 0.7)'; 
    button_alumni.style.color = '#E66432'; 
    button_team.style.backgroundColor = '#E66432'; 
    button_team.style.color = 'white';  
});

jQuery('#button_alumni').click(function(){
    var team = document.getElementById('team'); 
    var alumni = document.getElementById('alumni'); 
    var button_team = document.getElementById('button_team'); 
    var button_alumni = document.getElementById('button_alumni'); 
    team.style.display='none'; 
    alumni.style.display='block'; 
    button_team.style.backgroundColor = 'rgba(250, 250, 250, 0.7)'; 
    button_team.style.color = '#E66432'; 
    button_alumni.style.backgroundColor = '#E66432'; 
    button_alumni.style.color = 'white';
})