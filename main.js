window.onload = function() {
	//菜单
	const sidebar_menu = document.querySelector('.sidebar-menu')
	const sidebar_menu_w = parseInt(getComputedStyle(sidebar_menu)['width'])
	const menu_toggle = document.querySelector('.sidebar-menu-btn .dashicons')
	const menu_toggle_w = parseInt(getComputedStyle(menu_toggle)['width'])
	let menu_left = -(sidebar_menu_w - menu_toggle_w)
	sidebar_menu.style.left = screen.availWidth < 910 ? '-100%' : menu_left + 'px'
	menu_toggle.addEventListener('click', function() {
		if (this.classList[1] === 'dashicons-menu') {
			sidebar_menu.style.left = 0
			this.classList.remove('dashicons-menu')
			this.classList.add('dashicons-no-alt')
		} else {
			sidebar_menu.style.left = menu_left + 'px'
			this.classList.remove('dashicons-no-alt')
			this.classList.add('dashicons-menu')
		}
	})

	//返回顶部
	const gotop_btn = document.querySelector('.go-to-top')
	document.addEventListener('scroll', () => {
		if (document.documentElement.scrollTop >= 800) {
			gotop_btn.style.display = 'block'
		} else {
			gotop_btn.style.display = 'none'
		}
	})
	gotop_btn.addEventListener('click', () => {
		document.querySelector('html').scrollIntoView({ behavior: 'smooth' })
	})
}