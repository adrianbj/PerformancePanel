<?php

namespace MartinJirasek;

/**
 * Description of PerformanceRegister
 *
 * @author Martin Jirasek
 */
class PerformanceRegister
{

	const BREAKPOINT_DEFAULT_NAME = 'BP_';

	private static $names = array();
	private static $memory = array();
	private static $time = array();
	private static $breakpointCounter = 0;

	/**
	 * Add breakpoint
	 * @param string|null $name
	 * @param string|null $enforceParent unsupported yet
	 */
	public static function addBreakpoint($name = null, $enforceParent = null)
	{
		self::$breakpointCounter++;
		$trueName = self::getName($name);
		self::$names[$trueName] = $trueName;
		self::$memory[$trueName] = memory_get_peak_usage();
		self::$time[$trueName] = microtime(true);
	}

	/**
	 *
	 * @param string|null $name
	 * @return string
	 */
	private static function getName($name = null)
	{
		if ($name === null) {
			$name = self::BREAKPOINT_DEFAULT_NAME . self::$breakpointCounter;
		} else {
			if (self::isNameUsed($name)) {
				$name = self::getName($name . '_' . self::$breakpointCounter);
			}
		}
		return $name;
	}

	private static function isNameUsed($name)
	{
		return isset(self::$names[$name]);
	}

	public static function getMemory()
	{
		return self::$memory;
	}

	public static function getTime()
	{
		return self::$time;
	}

	public static function getNames()
	{
		return self::$names;
	}

}
