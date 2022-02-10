/**
 * Temporary constraint for max users count in admin panel
 */
const userMaxValue = 8;
const usersArray = document.querySelectorAll('.user-card');
const userAddBtn = document.querySelector('.user-add-btn');

if (usersArray.length == userMaxValue) {
    userAddBtn.classList.add('user-card__hidden');
} else {
    userAddBtn.classList.remove('user-card-hidden');
}