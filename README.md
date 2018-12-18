# Brimbly
> Start WordPress from scratch without reinventing the wheel

## Quick Start

Download or clone this repo<!--  and open `index.html` -->.

```shell
$ git clone https://github.com/paulshryock/Brimbly Brimbly
```

## WordPress Theme Functions

The main `functions.php` file loads the following functions from the following files:

- `functions/theme-setup.php`
	- Add Theme Support
- `functions/dependencies-and-meta.php`
	- Add stylesheets and scripts
	- Add async attribute
	- Remove query string from static resources
	- Remove Emojicons
	- Update body_class
- `functions/login-page.php`
	- Update login CSS and JavaScript
	- Update Login H1 title
	- Update Login H1 title hyperlink URL
- `functions/admin.php`
	- Update Admin CSS and JavaScript
- `functions/menus.php`
	- Register navigation menus
- `functions/template-tags.php`
	- Echo a template tag
- `functions/image-sizes.php`
	- Update default image sizes
	- Add custom image sizes
	- Add custom image size names for use in Add Media modal
- `functions/posts.php`
	- Update excerpt length
	- Update Read More link markup
	- Update More excerpt
	- Add lead class to first paragraph
- `functions/widgets.php`
	- Remove widget titles
	- Register widget area(s)

## Roadmap
- Add `wp-config.php`
- Add `.htaccess`
- Add `index.php`
- Add any other usual server configuration

## Contributing

If you'd like to contribute, please read the [Code of Conduct](https://github.com/paulshryock/Brimbly/blob/master/CODE_OF_CONDUCT.md), then fork the repository and use a feature
branch. Pull requests are welcome.

### Your First Contribution

Working on your first Pull Request? You can learn how from this *free* series, [How to Contribute to an Open Source Project on GitHub](https://egghead.io/series/how-to-contribute-to-an-open-source-project-on-github).

## Links

<!-- - Project homepage: https://paulshryock.github.io/Brimbly/ -->
- Repository: https://github.com/paulshryock/Brimbly
- Releases:
	- [v1.0.0 - Initial release](https://github.com/paulshryock/Brimbly/releases/tag/v1.0.0)
		<!-- - [v2.0.1 - XXXXXX](https://github.com/paulshryock/Brimbly/releases/tag/v2.0.1) -->
		<!-- - [v2.0.2 - XXXXXX](https://github.com/paulshryock/Brimbly/releases/tag/v2.0.2) -->
		<!-- - [v2.0.3 - XXXXXX](https://github.com/paulshryock/Brimbly/releases/tag/v2.0.3) -->
		<!-- - [v2.0.4 - XXXXXX](https://github.com/paulshryock/Brimbly/releases/tag/v2.0.4) -->
		<!-- - [v2.0.5 - XXXXXX](https://github.com/paulshryock/Brimbly/releases/tag/v2.0.5) -->
		<!-- - [v2.0.6 - XXXXXX](https://github.com/paulshryock/Brimbly/releases/tag/v2.0.6) -->
		<!-- - [v2.0.7 - XXXXXX](https://github.com/paulshryock/Brimbly/releases/tag/v2.0.7) -->
		<!-- - [v2.0.8 - XXXXXX](https://github.com/paulshryock/Brimbly/releases/tag/v2.0.8) -->
		<!-- - [v2.0.9 - XXXXXX](https://github.com/paulshryock/Brimbly/releases/tag/v2.0.9) -->
- Changelog: https://github.com/paulshryock/Brimbly/blob/master/CHANGELOG.md
- Issue tracker: https://github.com/paulshryock/Brimbly/issues
  - In case of sensitive bugs like security vulnerabilities, please contact paul@pshry.com directly instead of using issue tracker. We value your effort to improve the security and privacy of this project!
- Related projects:
  - Eustace: https://github.com/paulshryock/Eustace
  - Myrtle: https://github.com/paulshryock/Myrtle


## Licensing

The code in this project is licensed under [GNU General Public License v3.0](https://github.com/paulshryock/Brimbly/blob/master/LICENSE).