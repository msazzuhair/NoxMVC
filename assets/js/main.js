window.addEventListener("hashchange", removeHash);
function removeHash()
{
    history.replaceState("", document.title, window.location.pathname);
}