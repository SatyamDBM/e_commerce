document.addEventListener('DOMContentLoaded', () => {
  const sidebar = document.querySelector('.admin-sidebar');
  const overlay = document.querySelector('.sidebar-overlay');
  const toggles = document.querySelectorAll('.menu-toggle, #toggleMenu');

  if (!sidebar || !overlay || !toggles.length) return;

  const toggleSidebar = () => {
    sidebar.classList.toggle('collapsed');
    overlay.classList.toggle('active');
  };

  toggles.forEach(btn => btn.addEventListener('click', toggleSidebar));

  overlay.addEventListener('click', () => {
    sidebar.classList.add('collapsed');
    overlay.classList.remove('active');
  });

  // Handle resize
  const handleResize = () => {
    if (window.innerWidth >= 992) {
      sidebar.classList.remove('collapsed');
      overlay.classList.remove('active');
    } else {
      sidebar.classList.add('collapsed');
    }
  };

  handleResize();
  window.addEventListener('resize', handleResize);
});
