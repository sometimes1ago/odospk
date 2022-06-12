function createError(message, container) {
  $("<p class='text-14 text-light-400 break-words'>" + message + "</p>").appendTo($("<div class='w-full mt-16 mb-16 rounded-8 p-12 bg-state-error'></div>").appendTo($(container)));
}