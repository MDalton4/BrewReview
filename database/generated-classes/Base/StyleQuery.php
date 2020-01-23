<?php

namespace Base;

use \Style as ChildStyle;
use \StyleQuery as ChildStyleQuery;
use \Exception;
use \PDO;
use Map\StyleTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'style' table.
 *
 *
 *
 * @method     ChildStyleQuery orderByStyle($order = Criteria::ASC) Order by the style column
 * @method     ChildStyleQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     ChildStyleQuery groupByStyle() Group by the style column
 * @method     ChildStyleQuery groupByDescription() Group by the description column
 *
 * @method     ChildStyleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildStyleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildStyleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildStyleQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildStyleQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildStyleQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildStyleQuery leftJoinDrink($relationAlias = null) Adds a LEFT JOIN clause to the query using the Drink relation
 * @method     ChildStyleQuery rightJoinDrink($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Drink relation
 * @method     ChildStyleQuery innerJoinDrink($relationAlias = null) Adds a INNER JOIN clause to the query using the Drink relation
 *
 * @method     ChildStyleQuery joinWithDrink($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Drink relation
 *
 * @method     ChildStyleQuery leftJoinWithDrink() Adds a LEFT JOIN clause and with to the query using the Drink relation
 * @method     ChildStyleQuery rightJoinWithDrink() Adds a RIGHT JOIN clause and with to the query using the Drink relation
 * @method     ChildStyleQuery innerJoinWithDrink() Adds a INNER JOIN clause and with to the query using the Drink relation
 *
 * @method     \DrinkQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildStyle findOne(ConnectionInterface $con = null) Return the first ChildStyle matching the query
 * @method     ChildStyle findOneOrCreate(ConnectionInterface $con = null) Return the first ChildStyle matching the query, or a new ChildStyle object populated from the query conditions when no match is found
 *
 * @method     ChildStyle findOneByStyle(string $style) Return the first ChildStyle filtered by the style column
 * @method     ChildStyle findOneByDescription(string $description) Return the first ChildStyle filtered by the description column *

 * @method     ChildStyle requirePk($key, ConnectionInterface $con = null) Return the ChildStyle by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStyle requireOne(ConnectionInterface $con = null) Return the first ChildStyle matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildStyle requireOneByStyle(string $style) Return the first ChildStyle filtered by the style column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStyle requireOneByDescription(string $description) Return the first ChildStyle filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildStyle[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildStyle objects based on current ModelCriteria
 * @method     ChildStyle[]|ObjectCollection findByStyle(string $style) Return ChildStyle objects filtered by the style column
 * @method     ChildStyle[]|ObjectCollection findByDescription(string $description) Return ChildStyle objects filtered by the description column
 * @method     ChildStyle[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class StyleQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\StyleQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'socialmedia', $modelName = '\\Style', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildStyleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildStyleQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildStyleQuery) {
            return $criteria;
        }
        $query = new ChildStyleQuery();
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
     * @return ChildStyle|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(StyleTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = StyleTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildStyle A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT style, description FROM style WHERE style = :p0';
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
            /** @var ChildStyle $obj */
            $obj = new ChildStyle();
            $obj->hydrate($row);
            StyleTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildStyle|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildStyleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(StyleTableMap::COL_STYLE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildStyleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(StyleTableMap::COL_STYLE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the style column
     *
     * Example usage:
     * <code>
     * $query->filterByStyle('fooValue');   // WHERE style = 'fooValue'
     * $query->filterByStyle('%fooValue%', Criteria::LIKE); // WHERE style LIKE '%fooValue%'
     * </code>
     *
     * @param     string $style The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStyleQuery The current query, for fluid interface
     */
    public function filterByStyle($style = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($style)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StyleTableMap::COL_STYLE, $style, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStyleQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StyleTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query by a related \Drink object
     *
     * @param \Drink|ObjectCollection $drink the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildStyleQuery The current query, for fluid interface
     */
    public function filterByDrink($drink, $comparison = null)
    {
        if ($drink instanceof \Drink) {
            return $this
                ->addUsingAlias(StyleTableMap::COL_STYLE, $drink->getStyleName(), $comparison);
        } elseif ($drink instanceof ObjectCollection) {
            return $this
                ->useDrinkQuery()
                ->filterByPrimaryKeys($drink->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDrink() only accepts arguments of type \Drink or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Drink relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildStyleQuery The current query, for fluid interface
     */
    public function joinDrink($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Drink');

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
            $this->addJoinObject($join, 'Drink');
        }

        return $this;
    }

    /**
     * Use the Drink relation Drink object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DrinkQuery A secondary query class using the current class as primary query
     */
    public function useDrinkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDrink($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Drink', '\DrinkQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildStyle $style Object to remove from the list of results
     *
     * @return $this|ChildStyleQuery The current query, for fluid interface
     */
    public function prune($style = null)
    {
        if ($style) {
            $this->addUsingAlias(StyleTableMap::COL_STYLE, $style->getStyle(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the style table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(StyleTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            StyleTableMap::clearInstancePool();
            StyleTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(StyleTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(StyleTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            StyleTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            StyleTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // StyleQuery
