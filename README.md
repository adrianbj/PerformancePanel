# PerformancePanel
Tracy performance panel


![](http://i57.tinypic.com/ot234i.png)

##Installation
<pre><code>
composer require zarganwar/performance-panel
</code></pre>

##Registration
Example: instalation in Nette FW
<pre><code>
nette:
	debugger:
		bar:
			- Zarganwar\PerformancePanel\Panel
</code></pre>
##Usage
<pre><code>
Zarganwar\PerformancePanel\Register::addBreakpoint('A');
Zarganwar\PerformancePanel\Register::addBreakpoint('B');
</code></pre>
