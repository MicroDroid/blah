const LOGIN_URL = '/api/auth/login';
const REFRESH_URL = '/api/auth/refresh';

module = {
	user: {
		isAuthenticated: false,
		token: "",
	},

	receiveToken(token) {
		this.user.token = token;
		this.user.isAuthenticated = true;
		this.save();
	},

	setHeaders() {
		window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.user.token;
	},

	logout() {
		window.localStorage.removeItem('user');
		this.user = {isAuthenticated: false};
	},

	checkAuth(next) {
		const user = window.localStorage.getItem('user');
		
		if (user)
			this.user = JSON.parse(user);
		else
			this.user = {isAuthenticated: false};

		if (this.user.isAuthenticated)
			next();
		else
			window.location = '/auth';
	},

	save() {
		window.localStorage.setItem('user', JSON.stringify(this.user));
	}
}

module.receiveToken = module.receiveToken.bind(module);
module.logout = module.logout.bind(module);
module.setHeaders = module.setHeaders.bind(module);
module.checkAuth = module.checkAuth.bind(module);
module.save = module.save.bind(module);

export default module;