function isEmpty(input) {
  let processedInput = input.val().trim();

  if (processedInput) {
    return false;
  } else {
    return true;
  }
}

function validatePhone(phoneInput) {
  let regex = /^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/;
  return regex.test(phoneInput.val().trim());
}