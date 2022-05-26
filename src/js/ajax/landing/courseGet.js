let activeCourse = document.querySelector('.courses__item-active');
let courses = document.querySelectorAll(".courses__item");

courses.forEach((course) => {
  course.addEventListener('click', () => {
    activeCourse.classList.remove('courses__item-active');
    course.classList.add('courses__item-active');
    activeCourse = course;
  });
});

