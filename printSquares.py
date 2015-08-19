from itertools import takewhile

''' Python 3.x '''


def print_all(collection):
    [print(element) for element in collection]


def take(count, collection):
    i = 0

    def should_take(x):
        nonlocal i
        i += 1
        return i <= count

    return takewhile(should_take, collection)


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
