function createError(message, container) {
  let div = $("<div class='w-full flex items-center justify-between mt-16 mb-16 rounded-8 p-12 bg-state-error'></div>"),
    errorText = $("<p class='text-14 leading-none text-light-400 break-words'>" + message + "</p>"),
    errorCloser = $('<svg class="ml-8 md:w-24 md:h-24 cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">' +
      '<path d="M13.5 4.5L4.5 13.5" stroke="#fefefe" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>' +
      '<path d="M4.5 4.5L13.5 13.5" stroke="#fefefe" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>' +
    '</svg>"');
  
  errorText.appendTo(div);
  errorCloser.appendTo(div);
  div.appendTo(container);

  errorCloser.click(() => {
    div.css({display: 'none'});
  });
}
