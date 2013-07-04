1. Set target of health check.

```
$urls = array(
	'MyPortal' => 'http://example.com/',
	'MyBlog' => 'http://example.com/blog/',
	'Corporate' => 'http://www..example.net/',
);
```

2. Run

```
[prompt]$ php web_health_checker.php >/dev/null
```

ex) If 'MyBlog' returns HTTP 404

```
[prompt]$ php web_health_checker.php >/dev/null
MyBlog(http://example.com/blog/) response status is 404.
[prompt]$ echo $?
1
[prompt]$ 
```
