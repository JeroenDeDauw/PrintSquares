<?php

// PHP 5.5+ (5.4 might work)

printAll( take( 5, squaresOf( Integers::all() ) ) );

function printAll( $collection ) {
	collection_walk( $collection, function( $line ) { echo "$line\n"; } );
}

/**
 * @param int $count
 * @param array|Iterator $collection
 * @return Iterator
 */
function take( $count, $collection ) {
	return new LimitIterator( collection_to_iterator( $collection ), 0, $count );
}

/**
 * @param array|Iterator $collection
 * @return Iterator
 */
function collection_to_iterator( $collection ) {
	return is_array( $collection ) ? new ArrayIterator( $collection ) : $collection;
}

/**
 * @param array|Iterator $collection
 * @return Iterator
 */
function squaresOf( $collection ) {
	return collection_map( $collection, function( $number ) { return $number ** 2; } );
}

/**
 * @param array|Iterator $collection
 * @param callable $function
 * @return Iterator
 */
function collection_map( $collection, callable $function ) {
	foreach( $collection as $element ) {
		yield $function( $element );
	}
}

/**
 * @param array|Iterator $collection
 * @param callable $function
 */
function collection_walk( $collection, callable $function ) {
	array_walk( collection_to_array( $collection ), $function );
}

/**
 * @param array|Iterator $collection
 * @return array
 */
function collection_to_array( $collection ) {
	return is_array( $collection ) ? $collection : iterator_to_array( $collection );
}

class Integers {

	public static function all() {
		$i = 0;
		while ( true ) {
			yield ++$i;
		}
	}

}
