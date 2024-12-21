// Smooth scrolling for navigation links
document.querySelectorAll('.nav__links a').forEach(link => {
    link.addEventListener('click', event => {
      event.preventDefault();
      const targetId = link.getAttribute('href').substring(1);
      const targetElement = document.getElementById(targetId);
      if (targetElement) {
        window.scrollTo({
          top: targetElement.offsetTop - 50,
          behavior: 'smooth',
        });
      }
    });
  });
  
  // Form validation and booking functionality
  const form = document.querySelector('.header__form form');
  form.addEventListener('submit', event => {
    event.preventDefault(); // Prevent form submission for demonstration
    const firstName = form.querySelector('input[placeholder="First Name"]').value.trim();
    const lastName = form.querySelector('input[placeholder="Last Name"]').value.trim();
    const address = form.querySelector('input[placeholder="Address"]').value.trim();
    const phone = form.querySelector('input[placeholder="Phone No."]').value.trim();
  
    if (!firstName || !lastName || !address || !phone) {
      alert('Please fill out all fields to book an appointment.');
    } else if (!/^\d{10}$/.test(phone)) {
      alert('Please enter a valid 10-digit phone number.');
    } else {
      alert(`Thank you, ${firstName} ${lastName}! Your appointment has been booked.`);
      form.reset(); // Reset the form fields
    }
  });
  
  // Contact button scroll to footer
  document.querySelector('.btn').addEventListener('click', () => {
    const footer = document.querySelector('footer');
    footer.scrollIntoView({ behavior: 'smooth' });
  });
  