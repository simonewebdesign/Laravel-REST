
/* Display a confirm box when the user 
 * clicks on the delete link.
 */
function confirmDeleteHandler(e) {
  e = e || window.event;
  var target;
  target = e.target || e.srcElement;
  if ( target.className.match(/\bconfirmDelete\b/) ) {
    if (!confirm('Are you sure?')) {
      e.preventDefault();
    }
  }
}

if (document.body.addEventListener) {
  document.body.addEventListener('click', confirmDeleteHandler, false);
} else {
  document.body.attachEvent('onclick', confirmDeleteHandler); // for IE
}