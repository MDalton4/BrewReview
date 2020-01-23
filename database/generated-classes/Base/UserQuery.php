<?php

namespace Base;

use \User as ChildUser;
use \UserQuery as ChildUserQuery;
use \Exception;
use \PDO;
use Map\UserTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'user' table.
 *
 *
 *
 * @method     ChildUserQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     ChildUserQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildUserQuery orderByRealName($order = Criteria::ASC) Order by the real_name column
 * @method     ChildUserQuery orderByPermissions($order = Criteria::ASC) Order by the permissions column
 * @method     ChildUserQuery orderByPicture($order = Criteria::ASC) Order by the picture column
 * @method     ChildUserQuery orderByCreationtime($order = Criteria::ASC) Order by the creationTime column
 * @method     ChildUserQuery orderByLastactivitytime($order = Criteria::ASC) Order by the lastActivityTime column
 *
 * @method     ChildUserQuery groupByUsername() Group by the username column
 * @method     ChildUserQuery groupByPassword() Group by the password column
 * @method     ChildUserQuery groupByRealName() Group by the real_name column
 * @method     ChildUserQuery groupByPermissions() Group by the permissions column
 * @method     ChildUserQuery groupByPicture() Group by the picture column
 * @method     ChildUserQuery groupByCreationtime() Group by the creationTime column
 * @method     ChildUserQuery groupByLastactivitytime() Group by the lastActivityTime column
 *
 * @method     ChildUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUserQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUserQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUserQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUserQuery leftJoinPost($relationAlias = null) Adds a LEFT JOIN clause to the query using the Post relation
 * @method     ChildUserQuery rightJoinPost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Post relation
 * @method     ChildUserQuery innerJoinPost($relationAlias = null) Adds a INNER JOIN clause to the query using the Post relation
 *
 * @method     ChildUserQuery joinWithPost($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Post relation
 *
 * @method     ChildUserQuery leftJoinWithPost() Adds a LEFT JOIN clause and with to the query using the Post relation
 * @method     ChildUserQuery rightJoinWithPost() Adds a RIGHT JOIN clause and with to the query using the Post relation
 * @method     ChildUserQuery innerJoinWithPost() Adds a INNER JOIN clause and with to the query using the Post relation
 *
 * @method     ChildUserQuery leftJoinFriendRelatedByUsername($relationAlias = null) Adds a LEFT JOIN clause to the query using the FriendRelatedByUsername relation
 * @method     ChildUserQuery rightJoinFriendRelatedByUsername($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FriendRelatedByUsername relation
 * @method     ChildUserQuery innerJoinFriendRelatedByUsername($relationAlias = null) Adds a INNER JOIN clause to the query using the FriendRelatedByUsername relation
 *
 * @method     ChildUserQuery joinWithFriendRelatedByUsername($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the FriendRelatedByUsername relation
 *
 * @method     ChildUserQuery leftJoinWithFriendRelatedByUsername() Adds a LEFT JOIN clause and with to the query using the FriendRelatedByUsername relation
 * @method     ChildUserQuery rightJoinWithFriendRelatedByUsername() Adds a RIGHT JOIN clause and with to the query using the FriendRelatedByUsername relation
 * @method     ChildUserQuery innerJoinWithFriendRelatedByUsername() Adds a INNER JOIN clause and with to the query using the FriendRelatedByUsername relation
 *
 * @method     ChildUserQuery leftJoinFriendRelatedByFriendUsername($relationAlias = null) Adds a LEFT JOIN clause to the query using the FriendRelatedByFriendUsername relation
 * @method     ChildUserQuery rightJoinFriendRelatedByFriendUsername($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FriendRelatedByFriendUsername relation
 * @method     ChildUserQuery innerJoinFriendRelatedByFriendUsername($relationAlias = null) Adds a INNER JOIN clause to the query using the FriendRelatedByFriendUsername relation
 *
 * @method     ChildUserQuery joinWithFriendRelatedByFriendUsername($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the FriendRelatedByFriendUsername relation
 *
 * @method     ChildUserQuery leftJoinWithFriendRelatedByFriendUsername() Adds a LEFT JOIN clause and with to the query using the FriendRelatedByFriendUsername relation
 * @method     ChildUserQuery rightJoinWithFriendRelatedByFriendUsername() Adds a RIGHT JOIN clause and with to the query using the FriendRelatedByFriendUsername relation
 * @method     ChildUserQuery innerJoinWithFriendRelatedByFriendUsername() Adds a INNER JOIN clause and with to the query using the FriendRelatedByFriendUsername relation
 *
 * @method     ChildUserQuery leftJoinWishlist($relationAlias = null) Adds a LEFT JOIN clause to the query using the Wishlist relation
 * @method     ChildUserQuery rightJoinWishlist($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Wishlist relation
 * @method     ChildUserQuery innerJoinWishlist($relationAlias = null) Adds a INNER JOIN clause to the query using the Wishlist relation
 *
 * @method     ChildUserQuery joinWithWishlist($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Wishlist relation
 *
 * @method     ChildUserQuery leftJoinWithWishlist() Adds a LEFT JOIN clause and with to the query using the Wishlist relation
 * @method     ChildUserQuery rightJoinWithWishlist() Adds a RIGHT JOIN clause and with to the query using the Wishlist relation
 * @method     ChildUserQuery innerJoinWithWishlist() Adds a INNER JOIN clause and with to the query using the Wishlist relation
 *
 * @method     \PostQuery|\FriendQuery|\WishlistQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildUser findOne(ConnectionInterface $con = null) Return the first ChildUser matching the query
 * @method     ChildUser findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUser matching the query, or a new ChildUser object populated from the query conditions when no match is found
 *
 * @method     ChildUser findOneByUsername(string $username) Return the first ChildUser filtered by the username column
 * @method     ChildUser findOneByPassword(string $password) Return the first ChildUser filtered by the password column
 * @method     ChildUser findOneByRealName(string $real_name) Return the first ChildUser filtered by the real_name column
 * @method     ChildUser findOneByPermissions(int $permissions) Return the first ChildUser filtered by the permissions column
 * @method     ChildUser findOneByPicture(resource $picture) Return the first ChildUser filtered by the picture column
 * @method     ChildUser findOneByCreationtime(string $creationTime) Return the first ChildUser filtered by the creationTime column
 * @method     ChildUser findOneByLastactivitytime(string $lastActivityTime) Return the first ChildUser filtered by the lastActivityTime column *

 * @method     ChildUser requirePk($key, ConnectionInterface $con = null) Return the ChildUser by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOne(ConnectionInterface $con = null) Return the first ChildUser matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUser requireOneByUsername(string $username) Return the first ChildUser filtered by the username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByPassword(string $password) Return the first ChildUser filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByRealName(string $real_name) Return the first ChildUser filtered by the real_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByPermissions(int $permissions) Return the first ChildUser filtered by the permissions column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByPicture(resource $picture) Return the first ChildUser filtered by the picture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByCreationtime(string $creationTime) Return the first ChildUser filtered by the creationTime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByLastactivitytime(string $lastActivityTime) Return the first ChildUser filtered by the lastActivityTime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUser[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUser objects based on current ModelCriteria
 * @method     ChildUser[]|ObjectCollection findByUsername(string $username) Return ChildUser objects filtered by the username column
 * @method     ChildUser[]|ObjectCollection findByPassword(string $password) Return ChildUser objects filtered by the password column
 * @method     ChildUser[]|ObjectCollection findByRealName(string $real_name) Return ChildUser objects filtered by the real_name column
 * @method     ChildUser[]|ObjectCollection findByPermissions(int $permissions) Return ChildUser objects filtered by the permissions column
 * @method     ChildUser[]|ObjectCollection findByPicture(resource $picture) Return ChildUser objects filtered by the picture column
 * @method     ChildUser[]|ObjectCollection findByCreationtime(string $creationTime) Return ChildUser objects filtered by the creationTime column
 * @method     ChildUser[]|ObjectCollection findByLastactivitytime(string $lastActivityTime) Return ChildUser objects filtered by the lastActivityTime column
 * @method     ChildUser[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UserQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\UserQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'socialmedia', $modelName = '\\User', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUserQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUserQuery) {
            return $criteria;
        }
        $query = new ChildUserQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildUser|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UserTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UserTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildUser A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT username, password, real_name, permissions, picture, creationTime, lastActivityTime FROM user WHERE username = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildUser $obj */
            $obj = new ChildUser();
            $obj->hydrate($row);
            UserTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildUser|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UserTableMap::COL_USERNAME, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UserTableMap::COL_USERNAME, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%', Criteria::LIKE); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the real_name column
     *
     * Example usage:
     * <code>
     * $query->filterByRealName('fooValue');   // WHERE real_name = 'fooValue'
     * $query->filterByRealName('%fooValue%', Criteria::LIKE); // WHERE real_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $realName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByRealName($realName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($realName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_REAL_NAME, $realName, $comparison);
    }

    /**
     * Filter the query on the permissions column
     *
     * Example usage:
     * <code>
     * $query->filterByPermissions(1234); // WHERE permissions = 1234
     * $query->filterByPermissions(array(12, 34)); // WHERE permissions IN (12, 34)
     * $query->filterByPermissions(array('min' => 12)); // WHERE permissions > 12
     * </code>
     *
     * @param     mixed $permissions The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByPermissions($permissions = null, $comparison = null)
    {
        if (is_array($permissions)) {
            $useMinMax = false;
            if (isset($permissions['min'])) {
                $this->addUsingAlias(UserTableMap::COL_PERMISSIONS, $permissions['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($permissions['max'])) {
                $this->addUsingAlias(UserTableMap::COL_PERMISSIONS, $permissions['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_PERMISSIONS, $permissions, $comparison);
    }

    /**
     * Filter the query on the picture column
     *
     * @param     mixed $picture The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByPicture($picture = null, $comparison = null)
    {

        return $this->addUsingAlias(UserTableMap::COL_PICTURE, $picture, $comparison);
    }

    /**
     * Filter the query on the creationTime column
     *
     * Example usage:
     * <code>
     * $query->filterByCreationtime('2011-03-14'); // WHERE creationTime = '2011-03-14'
     * $query->filterByCreationtime('now'); // WHERE creationTime = '2011-03-14'
     * $query->filterByCreationtime(array('max' => 'yesterday')); // WHERE creationTime > '2011-03-13'
     * </code>
     *
     * @param     mixed $creationtime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByCreationtime($creationtime = null, $comparison = null)
    {
        if (is_array($creationtime)) {
            $useMinMax = false;
            if (isset($creationtime['min'])) {
                $this->addUsingAlias(UserTableMap::COL_CREATIONTIME, $creationtime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creationtime['max'])) {
                $this->addUsingAlias(UserTableMap::COL_CREATIONTIME, $creationtime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_CREATIONTIME, $creationtime, $comparison);
    }

    /**
     * Filter the query on the lastActivityTime column
     *
     * Example usage:
     * <code>
     * $query->filterByLastactivitytime('2011-03-14'); // WHERE lastActivityTime = '2011-03-14'
     * $query->filterByLastactivitytime('now'); // WHERE lastActivityTime = '2011-03-14'
     * $query->filterByLastactivitytime(array('max' => 'yesterday')); // WHERE lastActivityTime > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastactivitytime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByLastactivitytime($lastactivitytime = null, $comparison = null)
    {
        if (is_array($lastactivitytime)) {
            $useMinMax = false;
            if (isset($lastactivitytime['min'])) {
                $this->addUsingAlias(UserTableMap::COL_LASTACTIVITYTIME, $lastactivitytime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastactivitytime['max'])) {
                $this->addUsingAlias(UserTableMap::COL_LASTACTIVITYTIME, $lastactivitytime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_LASTACTIVITYTIME, $lastactivitytime, $comparison);
    }

    /**
     * Filter the query by a related \Post object
     *
     * @param \Post|ObjectCollection $post the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUserQuery The current query, for fluid interface
     */
    public function filterByPost($post, $comparison = null)
    {
        if ($post instanceof \Post) {
            return $this
                ->addUsingAlias(UserTableMap::COL_USERNAME, $post->getUsername(), $comparison);
        } elseif ($post instanceof ObjectCollection) {
            return $this
                ->usePostQuery()
                ->filterByPrimaryKeys($post->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPost() only accepts arguments of type \Post or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Post relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function joinPost($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Post');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Post');
        }

        return $this;
    }

    /**
     * Use the Post relation Post object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PostQuery A secondary query class using the current class as primary query
     */
    public function usePostQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPost($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Post', '\PostQuery');
    }

    /**
     * Filter the query by a related \Friend object
     *
     * @param \Friend|ObjectCollection $friend the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUserQuery The current query, for fluid interface
     */
    public function filterByFriendRelatedByUsername($friend, $comparison = null)
    {
        if ($friend instanceof \Friend) {
            return $this
                ->addUsingAlias(UserTableMap::COL_USERNAME, $friend->getUsername(), $comparison);
        } elseif ($friend instanceof ObjectCollection) {
            return $this
                ->useFriendRelatedByUsernameQuery()
                ->filterByPrimaryKeys($friend->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFriendRelatedByUsername() only accepts arguments of type \Friend or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FriendRelatedByUsername relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function joinFriendRelatedByUsername($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FriendRelatedByUsername');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'FriendRelatedByUsername');
        }

        return $this;
    }

    /**
     * Use the FriendRelatedByUsername relation Friend object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \FriendQuery A secondary query class using the current class as primary query
     */
    public function useFriendRelatedByUsernameQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFriendRelatedByUsername($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FriendRelatedByUsername', '\FriendQuery');
    }

    /**
     * Filter the query by a related \Friend object
     *
     * @param \Friend|ObjectCollection $friend the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUserQuery The current query, for fluid interface
     */
    public function filterByFriendRelatedByFriendUsername($friend, $comparison = null)
    {
        if ($friend instanceof \Friend) {
            return $this
                ->addUsingAlias(UserTableMap::COL_USERNAME, $friend->getFriendUsername(), $comparison);
        } elseif ($friend instanceof ObjectCollection) {
            return $this
                ->useFriendRelatedByFriendUsernameQuery()
                ->filterByPrimaryKeys($friend->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFriendRelatedByFriendUsername() only accepts arguments of type \Friend or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FriendRelatedByFriendUsername relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function joinFriendRelatedByFriendUsername($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FriendRelatedByFriendUsername');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'FriendRelatedByFriendUsername');
        }

        return $this;
    }

    /**
     * Use the FriendRelatedByFriendUsername relation Friend object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \FriendQuery A secondary query class using the current class as primary query
     */
    public function useFriendRelatedByFriendUsernameQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFriendRelatedByFriendUsername($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FriendRelatedByFriendUsername', '\FriendQuery');
    }

    /**
     * Filter the query by a related \Wishlist object
     *
     * @param \Wishlist|ObjectCollection $wishlist the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUserQuery The current query, for fluid interface
     */
    public function filterByWishlist($wishlist, $comparison = null)
    {
        if ($wishlist instanceof \Wishlist) {
            return $this
                ->addUsingAlias(UserTableMap::COL_USERNAME, $wishlist->getUsername(), $comparison);
        } elseif ($wishlist instanceof ObjectCollection) {
            return $this
                ->useWishlistQuery()
                ->filterByPrimaryKeys($wishlist->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByWishlist() only accepts arguments of type \Wishlist or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Wishlist relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function joinWishlist($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Wishlist');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Wishlist');
        }

        return $this;
    }

    /**
     * Use the Wishlist relation Wishlist object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \WishlistQuery A secondary query class using the current class as primary query
     */
    public function useWishlistQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinWishlist($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Wishlist', '\WishlistQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildUser $user Object to remove from the list of results
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function prune($user = null)
    {
        if ($user) {
            $this->addUsingAlias(UserTableMap::COL_USERNAME, $user->getUsername(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the user table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UserTableMap::clearInstancePool();
            UserTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UserTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UserTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UserTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UserQuery
