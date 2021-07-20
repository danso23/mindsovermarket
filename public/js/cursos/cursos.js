function showVideo(element) {
    var nameTemario = '',
    urlTemario = '',
    video = '',
    source = '';
    nameTemario = $(element).attr('data-temario'),
    urlTemario = $(element).attr('data-url-temario'),
    document.getElementById('videoPrincipal').innerHTML = '';
    source = document.createElement('source');
    source.setAttribute('src', urlTemario);
    document.getElementById('name_temario').innerHTML = nameTemario;
    video = document.getElementById('videoPrincipal');
    video.appendChild(source);
    video.muted = false;
    video.load();
    video.play();
}
