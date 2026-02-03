
const testimonials = [
  '"Teaching is easier with Quiz Buzz!" – Mr. Rahman, Teacher',
  '"Super easy  I love the instant scores!" – Nadia, Student',
  '"My students are more engaged than ever. " – Mrs. Arefin',
  '"Excellent for weekly practice quizzes. " – Nabil, Coach'
];

let current = 0;
const box = document.getElementById('testimonialBox');

function showTestimonial() {
  if (box) {
    box.textContent = testimonials[current];
    current = (current + 1) % testimonials.length;
  }
}

showTestimonial();
setInterval(showTestimonial, 4000);
