from itertools import islice

''' Python 3.x '''


def print_all(collection):
    [print(element) for element in collection]


def take(count, collection):
    return islice(collection, 0, count)


def squares_of(collection):
    return (x*x for x in collection)


class Integers:
    @staticmethod
    def all():
        i = 0
        while True:
            i += 1
            yield i


print_all(take(5, squares_of(Integers.all())))
