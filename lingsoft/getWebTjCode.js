//tongji
					var browser = {
                        versions: function () {
                            var u = navigator.userAgent, app = navigator.appVersion;
                            return {
                                mobile: (!!u.match(/AppleWebKit.*Mobile/) || !!u.match(/Windows Phone/) || !!u.match(/Android/) || !!u.match(/MQQBrowser/)) && !u.match(/iPad/)//是否为移动终端
                            };
                        }()
                    }
                    if (!browser.versions.mobile) {
                        // fake_404(is_spider);
                    }