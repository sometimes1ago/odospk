let feedbackValue = document.querySelector('.dropdown__changeFeedbackValue').dataset.dropdownvalue,
  feedbackProp = document.querySelector('.dropdown__changeFeedbackProp').dataset.dropdownvalue,
  feedbackChangeValue = document.querySelector('.changFeedbackValue'),
  feedbackChangeOptions = document.querySelectorAll('.changeFeedbackOption'),
  feedbackChangePropOptions = document.querySelectorAll('.changeFeedbackPropOption');

let changeFeedbackDataToSend = [
  feedbackValue,
  feedbackProp,
  feedbackChangeValue.value
];

feedbackChangeValue.onchange = () => {
  changeFeedbackDataToSend = [
    feedbackValue,
    feedbackProp,
    feedbackChangeValue.value
  ];

  console.log(changeFeedbackDataToSend);
}

feedbackChangeOptions.forEach((feedbackChangeOption) => {
  feedbackChangeOption.addEventListener('click', () => {
    feedbackValue = feedbackChangeOption.textContent;
  });
});

feedbackChangePropOptions.forEach((feedbackChangePropOption) => {
  feedbackChangePropOption.addEventListener('click', () => {
    feedbackProp = feedbackChangePropOption.textContent;
    console.log(feedbackProp);
  });
});